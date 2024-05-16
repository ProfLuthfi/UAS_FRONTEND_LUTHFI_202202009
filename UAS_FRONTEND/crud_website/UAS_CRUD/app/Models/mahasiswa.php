<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class mahasiswa extends Model
{
    use HasFactory, Sortable;
    protected $fillable = ['nim','nama','jurusan'];
    protected $sortable = ['nim','nama','jurusan'];
    protected $table = 'mahasiswa';
    public $timestamps=false;
}
