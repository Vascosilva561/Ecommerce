<!-- Modal de Preview - viewReceiptModal -->
<div class="modal fade" id="viewReceiptModal" tabindex="-1" role="dialog" aria-labelledby="viewReceiptModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewReceiptModalLabel">Comprovante de Pagamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Container para o preview -->
                <div id="viewReceiptModalPreviewContainer" class="d-flex justify-content-center align-items-center"
                    style="height: 100%; width: 100%;">
                    <!-- Preview da imagem -->
                    <img id="viewReceiptModalImagePreview" src="{{ $url }}" alt="Imagem de Comprovante"
                        class="img-fluid" style="max-height: 90vh; max-width: 100%;">
                    <!-- Preview do PDF -->
                    <embed id="viewReceiptModalPdfPreview" src="{{ $url }}" type="application/pdf"
                        style="width: 100%; height: 90vh;">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Esperar o DOM carregar
    const imagePreview = document.getElementById('viewReceiptModalImagePreview');
    const pdfPreview = document.getElementById('viewReceiptModalPdfPreview');
    const url = '{{ $url }}'; // URL do arquivo recebido no include
    const fileType = url.split('.').pop().toLowerCase();

    if (['jpg', 'jpeg', 'png', 'gif'].includes(fileType)) {
        imagePreview.src = url;
        pdfPreview.style.display = 'none';
    } else if (fileType === 'pdf') {
        pdfPreview.src = url;
        imagePreview.style.display = 'none';
    }
</script>
