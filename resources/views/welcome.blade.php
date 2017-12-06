<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <title>Телефонная книга</title>
    </head>
    <body>

        <div class="container">
            <h2>
                Телефонная книга
            </h2>

            <div>
                @if($errors)
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif
                <div class="add"><button class="btn">Добавить новую запись</button></div>
                <form class="form-horizontal hidden add_form" method="post" action="{{ route('add') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label for="first_name" class="col-md-4 control-label">Имя</label>
                        <div class="col-md-6">
                            <input id="first_name" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="last_name" class="col-md-4 control-label">Фамилия</label>
                        <div class="col-md-6">
                            <input id="last_name" class="form-control" name="last_name" value="{{ old('last_name') }}" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="middle_name" class="col-md-4 control-label">Отчество</label>
                        <div class="col-md-6">
                            <input id="middle_name" class="form-control" name="middle_name" value="{{ old('middle_name') }}" autofocus>
                        </div>
                    </div>

                    <div class="form-group phone">
                        <label for="phone" class="col-md-4 control-label phone_input_label">Телефон</label>
                        <div class="col-md-6">
                            <input id="phone" class="form-control phone_input" name="phone1" value="{{ old('phone') }}" autofocus>
                        </div>
                    </div>

                    <div class="text-center">
                        <div>
                            <button class="btn add_phone">Добавить еще один телефон</button>
                        </div>
                        <br>

                        <div>
                            <button class="btn">Сохранить</button>
                            <button class="btn cancel">Отменить</button>
                        </div>
                        <br>
                    </div>


                </form>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Отчество</th>
                            <th>Контакты</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($people as $index => $user)
                            <tr>
                                <th>{{ $index + 1 }}</th>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->middle_name }}</td>
                                <td>
                                    @foreach(json_decode($user->phone) as $phone)
                                        <div>{{ $phone }}</div>
                                    @endforeach
                                </td>
                                <td>
                                    <a title="просмотр" href="{{ route('single', ['id' => $user->id]) }}"><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <a title="редактировать" href="{{ route('edit', ['id' => $user->id]) }}"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a title="удалить" href="{{ route('delete', ['id' => $user->id]) }}"><i class="glyphicon glyphicon-remove"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    </body>
</html>