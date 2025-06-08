<?php
class Producto
{
    private $id;
    private $nombre;
    private $precio;
    private $categoria;
    private $descripcion;
    private $stock;
    private $imagen;
    private $pdo;

    public function __construct($id, $nombre, $precio, $categoria, $descripcion, $stock, $imagen = null, $pdo = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->categoria = $categoria;
        $this->descripcion = $descripcion;
        $this->stock = $stock;
        $this->imagen = $imagen;
        $this->pdo = $pdo;
    }

    public function guardar()
    {
        if (!$this->pdo) return false;
        $stmt = $this->pdo->prepare("INSERT INTO productos (nombre, precio, categoria, descripcion, stock, imagen) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$this->nombre, $this->precio, $this->categoria, $this->descripcion, $this->stock, $this->imagen]);
    }

    public function actualizar()
    {
        if (!$this->pdo) return false;
        $stmt = $this->pdo->prepare("UPDATE productos SET nombre=?, precio=?, categoria=?, descripcion=?, stock=?, imagen=? WHERE id=?");
        return $stmt->execute([$this->nombre, $this->precio, $this->categoria, $this->descripcion, $this->stock, $this->imagen, $this->id]);
    }

    public function eliminar()
    {
        if (!$this->pdo) return false;
        $stmt = $this->pdo->prepare("DELETE FROM productos WHERE id=?");
        return $stmt->execute([$this->id]);
    }

    public static function obtenerPorId($pdo, $id)
    {
        $stmt = $pdo->prepare("SELECT * FROM productos WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Producto(
                $row['id'],
                $row['nombre'],
                $row['precio'],
                $row['categoria'],
                $row['descripcion'],
                $row['stock'],
                isset($row['imagen']) ? $row['imagen'] : null,
                $pdo
            );
        }
        return null;
    }

    // Getter y Setter para imagen
    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
}
