<?php
namespace Models;

class NewsModel extends Database {
    public function GET_ALL(){
        $stm = $this->connection->query('SELECT * FROM news ORDER BY ID DESC');
        $stm->execute();
        return $stm->fetchAll();
    }
    public function GET_SINGLE($id){
        $stm = $this->connection->prepare('SELECT * FROM news WHERE id = :id');
        $stm->bindParam('id', $id);
        $stm->execute();
        return $stm->fetch();
    }

    public function UPDATE($id, $title, $category,$short_text,$text,$imgName) {
        $stm = $this->connection->prepare('UPDATE news
                                              SET title = :title,
                                                  category_id = :category,
                                                  short_text = :short_text,
                                                  text = :text
                                            WHERE id = :id');
        $stm->bindParam('id', $id);
        $stm->bindParam('title', $title);
        $stm->bindParam('category', $category);
        $stm->bindParam('short_text', $short_text);
        $stm->bindParam('text', $text);

        $stm->execute();

        if ($imgName) {
            $stm = $this->connection->prepare('UPDATE news
            SET image = :image WHERE id = :id');
        $stm->bindParam('id', $id);
        $stm->bindParam('image', $imgName);
        $stm->execute();
        }
    }

    public function INSERT($title, $category,$short_text,$text,$imgName) {
        $stm = $this->connection->prepare('INSERT INTO news (title, text, category_id,short_text, image) 
                                                VALUES (:title, :text, :category,:short_text,:imgName)');
        $stm->bindParam('title', $title);
        $stm->bindParam('text', $text);
        $stm->bindParam('category', $category);
        $stm->bindParam('short_text', $short_text);
        $stm->bindParam('imgName', $imgName);

        $stm->execute();
    }

    public function ERASURE($id) {
        $stm = $this->connection->prepare('DELETE FROM news WHERE id = :id');
        $stm->bindParam('id', $id);

        $stm->execute();
    }
}