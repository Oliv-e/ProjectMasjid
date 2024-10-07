<div x-data="next({{ $next_waktu * 1000 }}, '{{ $next_nama }}')" x-init="sCD()">
    <h1 class="fs-5 text-center">
        <span x-text="next_nama"></span> dalam
        <span x-text="jam"></span> Jam
        <span x-text="menit"></span> Menit
        <span x-text="detik"></span> Detik
    </h1>
</div>

<script>
    function next(t_waktu, t_nama) {
        return {
            t_waktu: t_waktu,
            next_nama: t_nama,
            jam: 0,
            menit: 0,
            detik: 0,
            interval: null,
            sCD() {
                this.upCD();
                this.interval = setInterval(() => {
                    this.upCD();
                }, 1000);
            },
            upCD() {
                let now = new Date().getTime();
                let distance = this.t_waktu - now;

                if (distance < 0) {
                    clearInterval(this.interval);
                    location.reload();
                    return;
                }
                this.jam = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                this.menit = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                this.detik = Math.floor((distance % (1000 * 60)) / 1000);
            },
            // fetch_next() {
            //     Livewire.dispatch('fetch_next_jadwal');
            // }
        }
    }
</script>
