class Notification{

    success(){
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: 'Data Berhasil Di input',
            timeout: 1000,
        }).show();
    }
    
    alert(){
        new Noty({
            type: 'alert',
            layout: 'topRight',
            text: 'Apakah Anda Yakin?',
            timeout: 1000,
        }).show();
    }

    error(){
        new Noty({
            type: 'alert',
            layout: 'topRight',
            text: 'Terjadi Kesalahan',
            timeout: 1000,
        }).show();
    }

    warning(){
        new Noty({
            type: 'warning',
            layout: 'topRight',
            text: 'Opps Salah',
            timeout: 1000,
        }).show();
    }

}

export default Notification = new Notification();