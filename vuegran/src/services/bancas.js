import api from './config';

export default {
  list:() => {
    return api.get('bancas')
  },
  save:(banca) => {
    return api.post('bancas', banca)
  },
  update:(banca) => {
    return api.put('bancas/'+banca.id, banca);
  },
  delete:(banca) => {
    return api.delete('bancas', {data: banca})
  }
}
