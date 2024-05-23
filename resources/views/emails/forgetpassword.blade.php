<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Password forget
    </title>
</head>

<body style="font-family: Open Sans,Helvetica,Arial,sans serif; margin:0;">
    <!-- <img src="{{ $logoUrl }}" alt="Website Logo" width="150">
    <p>Hi {{ $name }},</p>
    <p>{{ $body }}</p>
    <p>{{ $thanks }}</p> -->

    <div align="center" style="background-color:#fafafa; width:100%; margin:auto; padding: 20px 0 20px;">
        <table border="0" cellpadding="0" cellspacing="0" align="center"
            style="background-color:#fff; width:100%; max-width:600px; margin: 0 auto 0; text-align:center; padding: 30px; padding-bottom: 15px;">
            <tbody>
                <tr>
                    <td>
                        <img src="{{ $logoUrl }}" width="150px"></a>
                        <p style="text-align: center;">
                        <h1 style="margin-bottom: 10px;">Hi {{ $name }},</h1>
                        <p>Your password is: {{ $password }}</p>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>