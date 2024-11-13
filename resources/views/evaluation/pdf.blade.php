<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSSD Evaluation - Activity Seminar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            width: 100%;
            text-align: center;
        }

        .header span {
            display: grid;
            grid-template-columns: 1fr;
            /* 1 column per sentence */
            gap: 5px;
            /* Adds space between each sentence */
        }
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ public_path('images/eval/Picture1.png') }}" alt="Image 1">
        <img src="{{ public_path('images/eval/Picture2.png') }}" alt="Image 2">
        <img src="{{ public_path('images/eval/Picture3.png') }}" alt="Image 3">
        <span>
            Republic of the Philippines <br>
            Province of Laguna <br>
            CITY GOVERNMENT OF CALAMBA <br>
            CITY SOCIAL SERVICES DEPARTMENT <br>
        </span>
    </div>

    <table>
        <tr>
            <th>Question</th>
            <th>Answers</th>
        </tr>
        @foreach ($answers as $answer)
            <tr>
                <td>{{ $answer->question->question }}</td>
                <td>{{ $answer->answer }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
