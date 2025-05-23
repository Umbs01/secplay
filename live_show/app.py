from flask import Flask, request, render_template, redirect, url_for
from jinja2 import Environment, BaseLoader
from flask_socketio import SocketIO, emit
import threading
from misc.chat import send_random_messages 

app = Flask(__name__)
socketio = SocketIO(app, cors_allowed_origins="*")
jinja2_env = Environment(loader=BaseLoader)

@app.route('/', methods=['GET'])
def index():
    return render_template('index.html')
        
@app.route('/join', methods=['POST'])
def join():
    name = request.form.get('name') or 'Guest'
    response = app.make_response(redirect(url_for('liveshow')))
    response.set_cookie('name', name)
    return response

@app.route('/liveshow', methods=['GET'])
def liveshow():
    name = request.cookies.get('name', 'Guest')
    return render_template('liveshow.html', name=name)

@socketio.on('message')
def handle_message(data):
    message = data.get('data', '')
    user = data.get('user', 'Guest')

    try:
        message = jinja2_env.from_string(message).render(user=user)
        emit('response', {'data': message, 'user': user}, broadcast=True)
    except Exception as e:        
        emit('response', {'data': f'Error: {str(e)}', 'user': user}, broadcast=True)
    
if __name__ == '__main__':
    random_message_thread = threading.Thread(target=send_random_messages, args=(socketio,))
    random_message_thread.daemon = True 
    random_message_thread.start()
    
    app.run(host='0.0.0.0', port=5000)
    