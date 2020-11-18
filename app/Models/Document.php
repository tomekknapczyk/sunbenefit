<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'file_name', 'type'
    ];

    public function getTypeIco()
    {
        switch ($this->type) {
            case 'text/plain':
                return 'heroicon-o-document-text';
                break;
            case 'application/pdf':
                return 'heroicon-o-document-text';
                break;
            case 'image/jpeg':
                return 'heroicon-o-photograph';
                break;
            case 'image/png':
                return 'heroicon-o-photograph';
                break;
            case 'image/bmp':
                return 'heroicon-o-photograph';
                break;
            case 'application/msword':
                return 'heroicon-o-document-text';
                break;
            case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
                return 'heroicon-o-document-text';
                break;
            case 'application/vnd.ms-excel':
                return 'heroicon-o-document-report';
                break;
            case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
                return 'heroicon-o-document-report';
                break;
            default:
                return 'heroicon-o-document-text';
                break;
        }
    }
}
