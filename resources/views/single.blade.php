<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <title>Просмотр пользователя</title>
    </head>
    <body>
        <div class="container">
            <h2>
                Просмотр контакта
            </h2>
            <div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Отчество</th>
                        <th>Контакты</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
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
                    </tbody>
                </table>
            </div>

        </div>
    </body>
</html>