const WebSocket = require('ws');

const { exec } = require('child_process');



const wss = new WebSocket.Server({ port: 3000 });



wss.on('connection', (ws) => {

  let output = '';



  ws.on('message', (command) => {

    executeCommand(command.toString(), ws);

  });



  function executeCommand(command, ws) {

    const childProcess = exec(command, { shell: '/bin/bash' }, (error, stdout, stderr) => {

      if (error) {

        output += `Error executing command: ${error.message}\n`;

      } else if (stderr) {

        output += `${stderr.trim()}\n`;

      } else {

        output += `${stdout.trim()}\n`;

      }

      ws.send(output);

    });



    childProcess.on('exit', (code) => {

      output += `\nCommand execution completed with code ${code}\n`;

      ws.send(output);

      output = ''; // Clear the output

    });



    childProcess.stdout.on('data', (data) => {

      output += data;

    });



    childProcess.stderr.on('data', (data) => {

      output += data;

    });

  }

});

