<?php

namespace App\Services\Admin;

use App\Events\RequestAccepted;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Models\Barrow;
use App\Models\Book;
use App\Models\User;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{


    /**
     * @param UserCreateRequest $request
     * @return mixed
     */
    public function store(UserCreateRequest $request)
    {


        $data = $request->all();
        // add user requirements to array
        $data['request_count'] = 0;

        // create user
        $user = User::create($data);

        // Event Trigger
        event(new UserAdded($user));

        // return create status
        return $user;
    }


    /**
     *  Update the specified resource in storage.
     *
     * @param UserCreateRequest $request
     * @return array
     */
    public function update(UserCreateRequest $request, $id)
    {
        $user = $request->except('email');

        $user['password'] = Hash::make($request->input('password'));

        if (!$request->input('password'))
            unset($user['password']);
        // update user
        User::findOrFail($id)->update($user);

        return $user;
    }


    /**
     * .Determines the status of the requested item.
     *
     * @param Request $request
     * @param $userID
     * @param $barrowID
     * @return int
     */
    public function assignCollectionToUser(Request $request, $userID, $barrowID)
    {
        // if collection request was accepted
        if ($request->has('accept') && is_null($request->input('accept'))) {

            $barrow = Barrow::findOrFail($barrowID);
            if ($barrow) {
                // update status barrow op. successful
                $barrow->update(['status' => 'successful']);

                // update availability to false
                Book::findOrFail($barrow->book_id)->bookDetails()->update(['availability' => 0]);

                // trigger event
                event(new RequestAccepted($barrow->user, $barrow));

                return true;
            }

        }

        // if collection request was rejected
        if ($request->has('reject') && is_null($request->input('reject'))) {

            $barrow = Barrow::findOrFail($barrowID);
            if ($barrow) {
                // update status barrow op. unsuccessful
                $barrow->update(['status' => 'unsuccessful']);

                // update request count
                $user = User::findOrFail($userID);
                $user->update(['request_count' => $user->request_count - 1]);

                return true;
            }
        }

        // Confirms the status of the borrowed item if collection is return
        if ($request->has('return') && is_null($request->input('return'))) {

            $barrow = Barrow::findOrFail($barrowID);
            if ($barrow) {
                // update return status
                $barrow->update(['return_status' => 1]);
                // update availability
                Book::findOrFail($barrow->book_id)->bookDetails()->update(['availability' => 1]);

                // update request count user
                $user = User::findOrFail($userID);
                $user->update(['request_count' => $user->request_count - 1]);
                return true;
            }
        }
        return false;
    }

}
