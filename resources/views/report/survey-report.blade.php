<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey Report</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h2, h3 {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Survey Report for {{ $businessProfile->company_name }}</h2>
<p><strong>Industry:</strong> {{ $businessProfile->company_industry }}</p>

<h3>Survey Responses</h3>
<table>
    <thead>
    <tr>
        <th>Question</th>
        <th>Response</th>
    </tr>
    </thead>
    <tbody>
    @foreach($responses as $response)
        <tr>
            <td>{{ $response->question->text }}</td>
            <td>{{ $response->response }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<h3>Evaluation Details</h3>
<table>
    <thead>
    <tr>
        <th>Category</th>
        <th>Status</th>
        <th>Total Score</th>
    </tr>
    </thead>
    <tbody>
    @foreach($evaluationResults['evaluationData']->groupBy('category') as $category => $items)
        <tr>
            <td>{{ $category }}</td>
            <td>{{ $items->first()['status'] }}</td>
            <td>{{ $items->sum('score') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<h3>Overall Compliance Score</h3>
<table>
    <thead>
    <tr>
        <th>Item</th>
        <th>Score</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Total Score</td>
        <td>{{ $evaluationResults['totalScore'] }}</td>
    </tr>
    <tr>
        <td>Compliance Percentage</td>
        <td>{{ number_format($evaluationResults['compliancePercentage'], 2) }}%</td>
    </tr>
    </tbody>
</table>

</body>
</html>
