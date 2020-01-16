import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DemandeouvertureComponent } from './demandeouverture.component';

describe('DemandeouvertureComponent', () => {
  let component: DemandeouvertureComponent;
  let fixture: ComponentFixture<DemandeouvertureComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DemandeouvertureComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DemandeouvertureComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
