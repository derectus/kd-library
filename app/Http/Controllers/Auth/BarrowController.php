<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\BookRequest;
use App\Models\Barrow;
use App\Services\BarrowService;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BarrowController extends Controller
{
    protected $barrowService;


    /**
     * Create a new controller instance.
     *
     * @param BarrowService $barrowService
     * @return void
     */
    public function __construct(BarrowService $barrowService)
    {
        $this->middleware('verified');
        $this->middleware('is_banned');
        $this->barrowService = $barrowService;
    }


    /**
     * Apply to Book
     *
     * @param $slug
     * @param BookRequest $request
     * @return RedirectResponse
     */
    public function apply($slug, BookRequest $request)
    {
        if (Auth::user()->address != null && Auth::user()->phone != null && Auth::user()->zip != null && Auth::user()->city_id != null) {
            if (Auth::user()->request_count < 3) {
                if (!in_array($request->input('book_id'), Auth::user()->barrow->where('status', 'pending')->pluck('book_id')->toArray())) {
                    $barrow = $this->barrowService->createBarrow(Auth::user(), $request);
                    if (!$barrow) {
                        return redirect()->route('collections.book', $slug)
                            ->with('class', 'warning')
                            ->with('message', __('Beklenmeyen bir hata oluştu lütfen sonra tekrar deneyiniz. !'));
                    }
                }else{
                    return redirect()->route('collections.book', $slug)
                        ->with('class', 'warning')
                        ->with('message', __('Seçilen kollenksion istek listenizde mevcut. Lütfen farklı bir koleksiyon seçiniz. !'));
                }
            } else {
                return redirect()->route('collections.book', $slug)
                    ->with('class', 'danger')
                    ->with('message', __('Onay bekleyen 3 adet isteğiniz bulunmaktadır. İstekleriniz sonuçlandıktan sonra tekrar deneyiniz. !'));
            }
        } else {
            return redirect()->route('profile')
                ->with('class', 'danger')
                ->with('message', __('İstekte bulunmak için Adres, Telefon, Şehir ve Posta Kodu bilgilerini giriniz !'));
        }

        return redirect()->route('requests')
            ->with('class', 'success')
            ->with('message', __('İsteğiniz başarılı bir şekilde alındı. En kısa sürede geri dönüş sağlayacağız. !'));

    }

    /**
     * @param $book_id
     * @return RedirectResponse
     */
    public function cancel($request_id)
    {
        if ($barrow = $this->barrowService->removeBarrow($request_id)) {
            return redirect()->route('requests')
                ->with('class', 'success')
                ->with('message', __('İsteğiniz başarılı bir şekilde iptal edildi !'));
        }

    }
}
