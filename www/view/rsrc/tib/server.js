const WebSocket = require('ws');
const { exec } = require('child_process');

const wss = new WebSocket.Server({ port: 3000 });

wss.on('connection', (ws) => {
    let childProcess;

    ws.on('message', (command) => {
        if (childProcess && !childProcess.killed) {
            childProcess.kill();
        }

        try {
            const commandString = command.toString();
            childProcess = exec(commandString, { shell: '/bin/bash' });

            childProcess.stdout.on('data', (data) => {
                ws.send(data.toString());
            });

            childProcess.stderr.on('data', (data) => {
                ws.send(data.toString());
            });

            childProcess.on('close', (code) => {
                ws.send(`Command execution completed with code ${code}`);
            });
        } catch (error) {
            ws.send(`Error executing command: ${error.message}`);
        }
    });

    ws.on('close', () => {
        if (childProcess && !childProcess.killed) {
            childProcess.kill();
        }
    });
});


