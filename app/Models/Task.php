<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'description',
        'due_date',
        'user_id',
        'status',
    ];

    // Relacionamento com o projeto
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Relacionamento com o usuário atribuído
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
