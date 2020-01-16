export class ClientPotentiel{
   

    id_cp : number;
    nom:string;
    prenom:string;
    adresse:string;
    cp:number;
    ville:string;
    telephone:number;
    email:string;
    revenu_mensuel:number;
    num_demande: number;
    date_demande: Date;
    statut:string;
    message :string;

    

    constructor(
        id_cp : number, nom : string, prenom: string, adresse:string, cp:number, ville:string, telephone:number, email:string, revenu_mensuel:number, num_demande: number,
        date_demande: Date, statut:string
                )
    {
        this.id_cp = id_cp;
        this.nom = nom;
        this.prenom = prenom;
        this.adresse = adresse;
        this.cp = cp;
        this.ville = ville;
        this.telephone= telephone;
        this.email = email;
        this.revenu_mensuel=revenu_mensuel;
        this.num_demande=num_demande;
        this.date_demande=date_demande;
        this.statut=statut;
        
    }
    
}