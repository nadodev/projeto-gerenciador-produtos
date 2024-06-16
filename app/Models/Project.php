<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'client_id',
        'start_date',
        'end_date',
        'user_id',
        'status',
        'category_id',
    ];

     // Relacionamento com o cliente
     public function client()
     {
         return $this->belongsTo(Client::class, 'client_id');
     }

     // Relacionamento com o usuário atribuído
     public function assignedUser()
     {
         return $this->belongsTo(User::class, 'user_id');
     }

     // Relacionamento com a categoria
     public function category()
     {
         return $this->belongsTo(Category::class);
     }

     // Relacionamento com as tarefas
     public function tasks()
     {
         return $this->hasMany(Task::class);
     }
}
