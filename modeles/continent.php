    <?php 

    class Continent {
        /**
         * numéro du continent 
         *
         * @var int
         */
        private $num;

        /**
         * libellé du continent 
         *
         * @var string 
         */
        private $libelle;



        /**
         * lis dans le libelle
         */ 
        public function getLibelle() : string
        {
            return $this->libelle;
        }

    /**
     * écrit dans le libellé
    *
    * @param string $libelle
    * @return self
    */
        public function setLibelle(string $libelle) : self
        {
            $this->libelle = $libelle;

            return $this;
        }

        /**
         * Get the value of num
         */ 
        public function getNum()
        {
            return $this->num;
        }

        /**
         * Set the value of num
         *
         * @return  self
         */ 
        public function setNum($num)
        {
            $this->num = $num;

            return $this;
        }
        /**
         * retourne l'ensemble des continent 
         *
         * @return continent[] tableau d'objet continent 
         */
        public static function findAll() :array 
        {
            $req=monpdo::getInstance()->prepare("Select * from continent");
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'continent');
            $req->execute();
            $lesResultats=$req->fetchAll();
            return $lesResultats;
        }
        /**
         * trouve un continent par son num
         *
         * @param integer $id numero du continent 
         * @return continent objet continent trouvé
         */
        public static function findById(int $id) :continent 
        {
            $req=monpdo::getInstance()->prepare("Select * from continent where num= :id");
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'continent');
            $req->bindParam(':id', $id);
            $req->execute();
            $leResultats=$req->fetch();
            return $leResultats;
        }
        /**
         * Permet d'ajouter un continent
         *
         * @param continent  $continent continent a ajouter
         * @return integer résultat (1 si l'operation a réussi, 0 sinon)
         */
        public static function add(continent $continent ) :int 
        {
            $req=monpdo::getInstance()->prepare("insert into continent(libelle) values(:libelle)");
            $libelle=$continent->getlibelle();
            $req->bindParam(':libelle', $libelle);
            $nb=$req->execute();
            return $nb;
        }
        /**
         * permet de modifier un continent
         *
         * @param Continent $continent continent a modifier
         * @return integer  résultat (1 si l'operation a réussi, 0 sinon)
         */
        public static function update(Continent $continent ) :int 
        {
            $req=monpdo::getInstance()->prepare("update continent set libelle= :libelle where num= :id");
            $num=$continent->getNum();
            $libelle=$continent->getlibelle();
            $req->bindParam(':id', $num);
            $req->bindParam(':libelle',$libelle );
            $nb=$req->execute();
            return $nb;
        }
        /**
         * permet de supprimer un continent 
         *
         * @param Continent $continent a supprimer
         * @return integer
         */
        public static function delete(Continent $continent) :int 
        {
            $req=monpdo::getInstance()->prepare("delete from continent where num= :id");
            $req->bindParam(':id', $continent->getNum());
            $nb=$req->execute();
            return $nb;
        }

        /**
         * Set numéro du continent
         *
         * @param  int  $num  numéro du continent
         *
         * @return  self
         */ 
      
    }