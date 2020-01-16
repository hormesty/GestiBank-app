export class Utilisateur{
    
    id_utilisateur : number;
    nom:string;
    prenom:string;
    adresse:string;
    cp:number;
    ville:string;
    telephone:number;
    email:string;
    pseudo:string;a
    mdp:string;
    type: String;

    contructor( id_utilisateur : number, nom:string
                 ,prenom:string, adresse:string, cp:number, ville:string, telephone:number, email:string
                 , pseudo:string, mdp:string, type: String
        )
        {

        this.id_utilisateur = id_utilisateur;
        this.nom = nom;
        this.prenom = prenom;
        this.adresse = adresse;
        this.cp = cp;
        this.ville = ville;
        this.telephone= telephone;
        this.email = email;
        this.pseudo=pseudo;
        this.mdp=mdp;
        this.type=type;

    }
}