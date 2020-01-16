export class Conseiller{

    mat_conseiller : number;
    id_utilisateur : number;
    id_admin: number;
    datedebut : Date;
    datefin: Date;
    nom:string;
    prenom:string;
    adresse:string;
    cp:number;
    ville:string;
    telephone:number;
    email:string;
    pseudo:string;a
    mdp:string;

    constructor(mat_conseiller : number, id_utilisateur : number, id_admin: number, datedebut : Date, datefin: Date, nom:string,prenom:string, adresse:string, cp:number, ville:string, telephone:number, email:string, pseudo:string, mdp:string
        )
        {
        this.mat_conseiller = mat_conseiller;
        this.id_utilisateur = id_utilisateur;
        this.id_admin = id_admin;
        this.datedebut = datedebut;
        this.datefin = datefin;
        this.nom = nom;
        this.prenom = prenom;
        this.adresse = adresse;
        this.cp = cp;
        this.ville = ville;
        this.telephone= telephone;
        this.email = email;
        this.pseudo=pseudo;
        this.mdp=mdp;
    }
    
}