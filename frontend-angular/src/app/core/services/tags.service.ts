import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

import { ApiService } from './api.service';
import { map } from 'rxjs/operators';
import { Tag } from '../models/tags';

@Injectable()
export class TagsService {
  constructor (
    private apiService: ApiService
  ) {}

  getAll(): Observable<[Tag]> {
    return this.apiService.get('/tags')
          .pipe(map(data => data.tags));
  }

}
