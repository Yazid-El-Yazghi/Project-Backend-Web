<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_name',
        'age',
        'parent_name',
        'parent_email',
        'parent_phone',
        'tshirt_size',
        'shoe_size',
        'status'
    ];

    protected $casts = [
        'age' => 'integer'
    ];

    // Status constants
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    public function getStatusBadgeClass()
    {
        return match($this->status) {
            'approved' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
            'rejected' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
            default => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300'
        };
    }
}