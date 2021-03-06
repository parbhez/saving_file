<?php
	include 'DB.php';
	class Student {

		private $table = "tbl_student";

			private $name;
			private $dep;
			private $age;
			public function setName($name) {
				$this->name = $name;
			} 
			
			public function setDep($dep) {
				$this->dep = $dep;
			}

			public function setAge($age) {
				$this->age = $age;
			}

			public function insert() {
				$query = "INSERT INTO $this->table(name, dep, age) values(:name, :dep, :age)";
				$stmt = DB::prepare($query);
				$stmt->bindParam(':name',$this->name);
				$stmt->bindParam(':dep',$this->dep);
				$stmt->bindParam(':age',$this->age);
				return $stmt->execute();
			}

			public function update($id) {
				$query ="UPDATE $this->table 
				SET 
				name =:name,
				dep =:dep,
				age =:age
				WHERE id =:id";
				$stmt = DB::prepare($query);
				$stmt->bindParam(':name',$this->name);
				$stmt->bindParam(':dep',$this->dep);
				$stmt->bindParam(':age',$this->age);
				$stmt->bindParam(':id',$id);
				return $stmt->execute();
			}

			public function readbyid($id) {
				$sql ="SELECT * FROM $this->table WHERE id =:id";
				$stmt = DB::prepare($sql);
				$stmt->bindParam(':id',$id);
				$stmt->execute();
				return $stmt->fetch();
			}




		public function readAll() {
			$sql = "SELECT * FROM $this->table";
			$stmt = DB::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		
		public function delete($id) {
			$sql = "DELETE FROM $this->table WHERE id =:id";
			$stmt = DB::prepare($sql);
			$stmt->bindParam(':id',$id);
			return $stmt->execute();
		}
		
	}


?>