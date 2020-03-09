    <?php 

    class Nationalites {
        /**
         * numéro de la nationalité
         *
         * @var int
         */
        private $num;

        /**
         * libellé de la nationalité
         *
         * @var string 
         */
        private $libelle;
        /**
         * num continent (clé étrangère) relié a num de continent 
         *
         * @var int
         */
        private $numContinent;



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
         * Renvoie l'objet continent associé
         *
         * @return Continent
         */
        public function getNumContinent() :Continent
        {
                return Continent::findById($this->numContinent = $numContinent);
        }

     /**
      * ecrit le num continent
      *
      * @param Continent $numContinent
      * @return self
      */
        public function setNumContinent($numContinent) :self
        {
                $this->numContinent = $numContinent->getNum();

                return $this;
        }
        /**
         * retourne l'ensemble des nationalité
         *
         * @return nationalite[] tableau d'objet nationalité 
         */
        public static function findAll() :array 
        {
            $req=monpdo::getInstance()->prepare("select n.num, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num ");
            $req->setFetchMode(PDO::FETCH_CLASS);
            $req->execute();
            $lesResultats=$req->fetchAll();
            return $lesResultats;
        }
        /**
         * trouve une nationalité par son num
         *
         * @param integer $id numero de la  nationalité 
         * @return nationalite objet nationalité trouvé
         */
        public static function findById(int $id) :continent 
        {
            $req=monpdo::getInstance()->prepare("Select * from nationalite where num= :id");
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'nationalite');
            $req->bindParam(':id', $id);
            $req->execute();
            $leResultats=$req->fetchAll();
            return $leResultats;
        }
        /**
         * Permet d'ajouter une nationalité
         *
         * @param nationalite  $nationalite nationalité a ajouter
         * @return integer résultat (1 si l'operation a réussi, 0 sinon)
         */
        public static function add(Nationalite $nationalite ) :int 
        {
            $req=monpdo::getInstance()->prepare("insert into nationalite(libelle,numContinent) values(:libelle, :numContinent)");
            $req->bindParam(':libelle', $nationalite->getlibelle());
            $req->bindParam(':numContinent', $nationalite->numContinent());
            $nb=$req->execute();
            return $nb;
        }
        /**
         * permet de modifier une nationalité
         *
         * @param nationalite $nationalite nationalité a modifier
         * @return integer  résultat (1 si l'operation a réussi, 0 sinon)
         */
        public static function update(Nationalite $nationalite ) :int 
        {
            $req=monpdo::getInstance()->prepare("update nationalite set libelle= :libelle, numContinent= :num");
            $req->bindParam(':id', $nationalite->getNum());
            $req->bindParam(':libelle', $nationalite->getlibelle());
            $req->bindParam(':numContinent', $nationalite->numContinent());
            $nb=$req->execute();
            return $nb;
        }
        /**
         * permet de supprimer une nationalité 
         *
         * @param nationalite $nationalité a supprimer
         * @return integer
         */
        public static function delete(Nationalite $nationalite) :int 
        {
            $req=monpdo::getInstance()->prepare("delet from nationalite where num= :id");
            $req->bindParam(':libelle', $nationalite->getlibelle());
            $nb=$req->execute();
            return $nb;
        }

     
    }