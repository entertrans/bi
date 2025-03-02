@props(['useScript'])

@switch($useScript)

    @case('detailInvoice')
        <script>
            // Format tanggal dengan hari
            $("[id='format-tanggal-hari']").each(function() {
                let tanggalRaw = $(this).data("tanggal");
                if (tanggalRaw) {
                    let tanggal = new Date(tanggalRaw);
                    let formatTanggal = tanggal.toLocaleDateString("id-ID", {
                        weekday: "long",
                        day: "2-digit",
                        month: "long",
                        year: "numeric"
                    });
                    $(this).text(formatTanggal);
                }
            });

            // Format tanggal tanpa hari
            $("[id='format-tanggal']").each(function() {
                let tanggalRaw = $(this).data("tanggal");
                if (tanggalRaw) {
                    let tanggal = new Date(tanggalRaw);
                    let formatTanggal = tanggal.toLocaleDateString("id-ID", {
                        day: "2-digit",
                        month: "long",
                        year: "numeric"
                    });
                    $(this).text(formatTanggal);
                }
            });

            // Format nominal rupiah
            $("[id='format-nominal']").each(function() {
                let nominalRaw = parseFloat($(this).data("nominal")) || 0; // Pastikan tetap angka
                let formatNominal = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }).format(nominalRaw);

                // Jika nominal 0, tetap tampilkan "Rp. 0"
                $(this).text(formatNominal);
            });
        </script>
    @break

    @case('invoice')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                new TomSelect('#siswa', {
                    plugins: ['no_backspace_delete', 'remove_button', ],
                    persist: false,
                    maxOptions: null,
                    optionClass: 'option',
                    itemClass: 'item',
                    render: {
                        option: function(data, escape) {
                            return `<div class="dark:hover:bg-gray-100">${escape(data.text)}</div>`;
                        },
                        item: function(data, escape) {
                            return `<div class="item">${escape(data.text)}</div>`;
                        },
                        optgroup_header: function(data, escape) {
                            return `<div class="text-sm font-medium text-gray-900 dark:text-black">${escape(data.label)}</div>`;
                        }
                    }
                });
            });
        </script>
    @break

    {{-- cara menambahkan
        @case('param')
        masukan script disini
        @break --}}

    @default
        <span>script not found</span>
@endswitch
