@extends('layouts.admin')

@section('js')
    <script>
        $(document).ready(function () {

            // Selectize
            $('#user').selectize({
                persist: false
            });

            // Send email
            $("form").submit(function (e) {

                e.preventDefault();

                let success = true;
                let user = $('#user').val();
                let issue = $('#issue').val();

                if (user == '0') {
                    alert('Epostanın kime gönderileceği seçilmeli!');
                    success = false;
                }

                if (issue == '0') {
                    alert('Epostanın taslağı seçilmeli!');
                    success = false;
                }

                if (success) {

                    let users = [];
                    if (user == 'everybody') {
                        $('#users option').each(function () {
                            users.push($(this).val());
                        });
                    } else {
                        users.push($('#user option').val());
                    }

                    $('#progress').show();
                    $('.btn-success').hide();

                    let progress = 0;
                    let count = 1;
                    for (let i = 0, p = Promise.resolve(); i < users.length; i++) {
                        p = p.then(_ => new Promise(resolve =>
                            setTimeout(function () {
                                $.ajax({
                                    type: "GET",
                                    url: 'email/send/' + users[i] + '/' + issue,
                                    success: function (data) {
                                        progress += 100 / users.length;
                                        $('.progress-bar').css('width', progress + '%');
                                        $('.progress-bar span').html('%' + parseInt(progress) + ' (' + count + ')');

                                        if (count == users.length) {
                                            $('#progress .alert').removeClass('alert-info');
                                            $('#progress .alert').addClass('alert-success');
                                            alert('Gonderim Tamamlandi');
                                        }
                                        count++;
                                        resolve();
                                    }
                                });
                            }, 1)
                        ));
                    }

                }

            });

        });
    </script>
@stop
