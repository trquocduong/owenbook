<!DOCTYPE html>
<html>

<head>
    <title>Bank Transactions</title>
    <script>
        // Function to send data to server
        function sendDataToServer(data) {
            fetch('/store-bank-data', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        // Extract data from table and send to server
        function extractAndSendData() {
            const rows = document.querySelectorAll('table tbody tr');
            const data = Array.from(rows).map(row => {
                const cells = row.querySelectorAll('td');
                return {
                    id: cells[0].innerText,
                    description: cells[1].innerText,
                    amount: parseFloat(cells[2].innerText),
                    bankSubAccId: cells[3].innerText,
                    corresponsiveName: cells[4].innerText,
                    corresponsiveAccount: cells[5].innerText,
                    corresponsiveBankId: cells[6].innerText,
                    corresponsiveBankName: cells[7].innerText,
                    bankCodeName: cells[8].innerText
                };
            });
            sendDataToServer({
                data: {
                    records: data
                }
            });
        }

        // Call extractAndSendData function every 60 seconds
        setInterval(extractAndSendData, 5000);

        function refreshPage() {
            window.location.reload(); // Làm mới trang
        }

        // Gọi hàm refreshPage sau 60 giây (60,000 milliseconds)
        setTimeout(refreshPage, 60000);
    </script>

</head>

<body>
    <h1>Bank Transactions</h1>

    @if(isset($lsgd) && is_array($lsgd) && count($lsgd) > 0)
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Bank Sub Account ID</th>
                <th>Corresponding Name</th>
                <th>Corresponding Account</th>
                <th>Corresponding Bank ID</th>
                <th>Corresponding Bank Name</th>
                <th>Bank Code Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lsgd as $record)
            <tr>
                <td>{{ $record['id'] }}</td>
                <td>{{ $record['description'] }}</td>
                <td>{{ $record['amount'] }}</td>
                <td>{{ $record['bankSubAccId'] }}</td>
                <td>{{ $record['corresponsiveName'] }}</td>
                <td>{{ $record['corresponsiveAccount'] }}</td>
                <td>{{ $record['corresponsiveBankId'] }}</td>
                <td>{{ $record['corresponsiveBankName'] }}</td>
                <td>{{ $record['bankCodeName'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No records found or invalid data structure.</p>
    @endif

</body>

</html>