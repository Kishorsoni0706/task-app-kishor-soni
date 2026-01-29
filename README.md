# Task Management App

## 1. Setup

```bash
git clone https://github.com/yourusername/task-app-yourname.git
cd task-app-yourname
composer install
npm install
cp .env.example .env
php artisan key:generate
Update .env with your database credentials.

2. Migrate & Seed
php artisan migrate --seed
3. Run App
php artisan serve      # Backend
npm run dev             # Frontend (Vite)
Visit: http://127.0.0.1:8000/tasks

4. Run Tests
php artisan test
5. API Endpoints
Method	Endpoint	Description
GET	/api/tasks	List tasks
POST	/api/tasks	Create task
GET	/api/tasks/{id}	View task
PUT	/api/tasks/{id}	Update task
DELETE	/api/tasks/{id}	Delete task
6. Frontend Features
List tasks with status badges

Create / Edit / Delete tasks

Responsive UI with Tailwind CSS

7. Notes
Clear cache if a blank page appears:

php artisan optimize:clear
php artisan route:clear
Use /tasks?status=pending for task filtering