





<div id="terminal"></div>



<script>

    const terminal = document.getElementById('terminal');

    const inputField = document.createElement('input');



    const socket = new WebSocket('ws://localhost:3000'); // Replace with your server URL



    socket.addEventListener('open', () => {

        terminal.innerHTML = 'Connected to server\n';

    });



    socket.addEventListener('message', (event) => {

        terminal.innerHTML += event.data + '\n';

        terminal.scrollTop = terminal.scrollHeight;

    });



    const inputListener = (event) => {

        if (event.key === 'Enter') {

            const command = event.target.value;

            event.target.value = '';



            socket.send(command);

            terminal.innerHTML += '> ' + command + '\n';

            terminal.scrollTop = terminal.scrollHeight;



            event.preventDefault();

        }

    };



    inputField.addEventListener('keydown', inputListener);

    document.body.appendChild(inputField);

    inputField.focus();

</script>
