import random
import time

def generate_random_message():
    messages = [
        "Hello, everyone!",
        "How's it going?",
        "Let's have some fun!",
        "What do you think about the topic?",
        "Any predictions for the next segment?",
        "11111111111",
        "22222222222",
        "Ls in the chat!",
        "Spam the chat with your thoughts!",
        "W take",
        "Do a backflip!",
        "OMEGALUL",
        "LMAO",
        "LOL"
    ]
    return random.choice(messages)

def generate_random_user():
    words = [
        "Big",
        "Dog",
        "Cat",
        "Lemon",
        "Tuna",
        "White",
        "12",
        "xx"
    ] 
    return f"{random.choice(words)+random.choice(words)}"

def generate_random_data():
    return {
        'data': generate_random_message(),
        'user': generate_random_user()
    }
    
def send_random_messages(sio):
    while True:
        interval = random.randint(1, 5)
        data = generate_random_data()
        sio.emit('message', data)
        time.sleep(interval)

    