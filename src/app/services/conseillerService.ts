import{HttpClient} from "@angular/common/http";
import{Conseiller} from "../models/conseiller";
import{Observable} from "rxjs";
import {Injectable} from "@angular/core";

@Injectable()

export class ConseillerService {

    private apiUrl = 'http://127.0.0.1:8080/projects/GESTI_bank/conseiller';

    constructor (private http: HttpClient){}

    findAll():Observable<Conseiller[]>
    {
        return this.http.get<Conseiller[]>(this.apiUrl);
    }

    findConseillerByMatricule(matConseiller:number):Observable<Conseiller>
    {
        var newUrl=this.apiUrl+"/"+matConseiller;
        console.log (newUrl);
        return this.http.get<Conseiller>(this.apiUrl+"/"+matConseiller);
    }

    updateConseiller(conseiller:Conseiller):Observable<Conseiller>
    {
        return this.http.put<Conseiller>(this.apiUrl, conseiller);
    }

    addConseiller(conseiller:Conseiller):Observable<Conseiller>
    {
        return this.http.post<Conseiller>(this.apiUrl, conseiller);

    }
}