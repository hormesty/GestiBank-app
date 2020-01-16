import{HttpClient} from "@angular/common/http";
import{Utilisateur} from "../models/utilisateur";
import{Observable} from "rxjs";
import {Injectable} from "@angular/core";

@Injectable()

export class UtilisateurService {

    private apiUrl = 'http://localhost:8080/Api_heritage/utilisateur';

    constructor (private http: HttpClient){}

    findAll():Observable<Utilisateur[]>
    {
        return this.http.get<Utilisateur[]>(this.apiUrl);
    }

}