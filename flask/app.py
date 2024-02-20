from flask import Flask, render_template, request, redirect, url_for, send_from_directory
from werkzeug.utils import secure_filename
import os
from datetime import datetime

app = Flask(__name__)

UPLOAD_FOLDER = 'uploads'
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER
ALLOWED_EXTENSIONS = {'png', 'jpg', 'jpeg', 'gif'}

# 게시판을 시뮬레이션하기 위한 더미 데이터
app.bulletin_board = []
app.post_id_counter = 1

if not os.path.exists(UPLOAD_FOLDER):
    os.makedirs(UPLOAD_FOLDER)


def allowed_file(filename):
    return '.' in filename and filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS


@app.route('/')
def index():
    return render_template('index.html', posts=app.bulletin_board)


@app.route('/add_post', methods=['POST'])
def add_post():
    title = request.form['title']
    content = request.form['content']

    # 파일 업로드 처리
    file = request.files['file']
    if file and allowed_file(file.filename):
        filename = secure_filename(file.filename)
        file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
        file_url = filename
    else:
        file_url = None

    # 새로운 게시물을 게시판에 추가합니다.
    post = {'id': app.post_id_counter, 'title': title, 'content': content, 'file_url': file_url, 'upload_date': datetime.now().strftime("%Y-%m-%d %H:%M:%S")}
    app.bulletin_board.append(post)
    app.post_id_counter += 1

    return redirect(url_for('index'))


@app.route('/uploads/<filename>')
def uploaded_file(filename):
    return send_from_directory(app.config['UPLOAD_FOLDER'], filename)


@app.route('/write_post')
def write_post():
    return render_template('write_post.html')


@app.route('/view_post/<int:post_id>')
def view_post(post_id):
    post = next((p for p in app.bulletin_board if p['id'] == post_id), None)
    if post:
        return render_template('view_post.html', post=post)
    else:
        return '게시글을 찾을 수 없습니다.'


if __name__ == '__main__':
    app.run(debug=True)
