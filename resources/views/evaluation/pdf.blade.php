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
            gap: 5px;
        }

        /* Page break before new total */
        .new-page {
            page-break-before: always;
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

    @foreach ($totals as $index => $total)
        <!-- Add a new page before the next total (except for the first one) -->
        @if ($index > 0)
            <div class="new-page"></div>
        @endif

        <h3>{{ $total['criteria'] }} (Answered on: {{ $total['answered_on'] }})</h3>

        <!-- Display the Answer Type -->
        <p><strong>Answer Type:</strong> {{ $total['answers']->first()->question->criteria->answer_type ?? 'N/A' }}</p>

        <!-- Questions and Answers Table -->
        <table border="1" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($total['answers'] as $answer)
                    <tr>
                        <td>{{ $answer->question->question ?? 'N/A' }}</td>
                        <td>{{ $answer->answer }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Likert Tally and Percentage Table -->
        @if (array_sum($total['tally']) > 0)
            <table border="1" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <thead>
                    <tr>
                        <th>Rating</th>
                        <th>Tally</th>
                        <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ratings as $rating)
                        <tr>
                            <td>{{ $rating }}</td>
                            <td>{{ $total['tally'][$rating] }}</td>
                            <td>{{ $total['percentages'][$rating] }}%</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><strong>Total Questions</strong></td>
                        <td colspan="2">{{ $total['total_questions'] }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
    @endforeach

</body>

</html>
