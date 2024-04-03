document.getElementById("send").addEventListener("click", send);

function send()
{
    let output = document.getElementById("output")

    const jsonData = {
        length: document.getElementById("length").value,
        hasNumbers: document.getElementById("isNumbers").checked,
        hasBigLetters: document.getElementById("isBigLetters").checked,
        hasSmallLetters: document.getElementById("isSmallLetters").checked
    };

    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json' // Set content type to JSON
        },
        body: JSON.stringify(jsonData) // Convert JSON data to a string and set it as the request body
    };

    fetch('/manager', options)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            return response.json();
        })
        .then(data => {
            output.innerHTML = data.password
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });

}