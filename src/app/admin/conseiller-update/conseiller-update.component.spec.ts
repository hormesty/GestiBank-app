import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ConseillerUpdateComponent } from './conseiller-update.component';

describe('ConseillerUpdateComponent', () => {
  let component: ConseillerUpdateComponent;
  let fixture: ComponentFixture<ConseillerUpdateComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ConseillerUpdateComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ConseillerUpdateComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
