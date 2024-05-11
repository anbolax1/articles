<?php
namespace app\repositories;

use app\models\Author;

class AuthorRepository {
    public function findById($id) {
        return Author::findOne($id);
    }

    public function save(Author $author) {
        return $author->save();
    }
}
