<div class="modal fade" id="uploadReceiptModal" tabindex="-1" role="dialog" aria-labelledby="uploadReceiptModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('payments.addReceipt', $order->payment->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadReceiptModalLabel">Enviar Comprovante de Pagamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="receipt_image">Selecione o comprovante (Imagem ou PDF)</label>
                        <input type="file" name="receipt_image" id="receipt_image" class="form-control"
                            accept="image/*,application/pdf" required>
                    </div>
                    <div class="text-center" id="filePreviewContainer" style="display: none;">
                        <div id="imagePreview" style="display: none;">
                            <img id="receiptImagePreview" src="#" alt="Visualização do Comprovante"
                                class="img-fluid img-thumbnail" style="max-width: 100%;">
                        </div>
                        <div id="pdfPreview" style="display: none;">
                            <embed id="receiptPdfPreview" src="#" type="application/pdf" width="100%"
                                height="500px">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Confirmar Envio</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>
    document.getElementById('receipt_image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const fileReader = new FileReader();
        const previewContainer = document.getElementById('filePreviewContainer');
        const imagePreview = document.getElementById('imagePreview');
        const pdfPreview = document.getElementById('pdfPreview');

        // Limpar previews anteriores
        imagePreview.style.display = 'none';
        pdfPreview.style.display = 'none';

        // Mostrar preview do arquivo selecionado
        if (file) {
            const fileType = file.type;
            previewContainer.style.display = 'block';

            if (fileType.startsWith('image/')) {
                // Se for uma imagem
                const reader = new FileReader();
                reader.onload = function(event) {
                    const img = document.getElementById('receiptImagePreview');
                    img.src = event.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else if (fileType === 'application/pdf') {
                // Se for um PDF
                const reader = new FileReader();
                reader.onload = function(event) {
                    const embed = document.getElementById('receiptPdfPreview');
                    embed.src = event.target.result;
                    pdfPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }
    });
</script>
