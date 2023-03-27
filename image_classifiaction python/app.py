import tensorflow as tf
import numpy as np
from PIL import Image
from flask import Flask, request, jsonify
from flask_cors import CORS


# Load the pre-trained model
model = tf.keras.applications.MobileNetV2(include_top=True, weights='imagenet')

# Load the class names for the model
with open('imagenet_classes.txt', 'r') as f:
    classes = [line.strip() for line in f.readlines()]

# Initialize a Flask application
app = Flask(__name__)
CORS(app)

# Define an endpoint to handle image classification requests
@app.route('/classify', methods=['POST'])

def classify_image():
    # Check if a file was uploaded in the request
    if 'image' not in request.files:
        return 'Error: No file uploaded.h'
    
    # Load the input image and preprocess it
    image = Image.open(request.files['image'])
    image = image.convert('RGB')
    image = image.resize((224, 224))
    image = np.asarray(image)
    image = tf.keras.applications.mobilenet_v2.preprocess_input(image)

    # Make a prediction on the input image
    prediction = model.predict(np.array([image]))

    # Get the predicted class index
    class_idx = np.argmax(prediction)
    if class_idx >= len(classes):
        response=jsonify({'class':'Unknown'})
    else:
        response = jsonify({'class': classes[class_idx]})
    response.headers.add('Access-Control-Allow-Origin', '*')
    # Check if the predicted class index is within the range of the classes list
    
    return response

if __name__ == '__main__':
    app.run()