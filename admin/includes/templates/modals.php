<!-- Modal Logout -->
<div class="modal modal-dark-mode fade" id="modalLogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Keluar?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Anda yakin ingin mengkahiri sesi anda saat ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
        <form action="<?= $url; ?>dashboard/delete" method="post">
          <input hidden type="text" name="id" value="<?= base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($row["id"]))))))))); ?>">
          <a href="<?= $url ?>auth/logout" class="btn btn-danger">
            Keluar
          </a>
        </form>
      </div>
    </div>
  </div>
</div>

<?php if ($rowSession["level"] !== $levelSuperAdmin) : ?>
  <!-- Modal Chat Box-->
  <?php if (isset($_POST["send_whatsapp"])) : ?>
    <?php
    $messageWhatsApp = $_POST["message_whatsapp"];
    $numberWhatsApp = "62" . $rowContact["no_telp"];
    ?>
    <script>
      document.location.href = 'https://wa.me/<?= $numberWhatsApp; ?>?text=<?= $messageWhatsApp; ?>';
    </script>
  <?php endif; ?>
  <div class="modal fade chat-box" id="modaChatBox" tabindex="-1" aria-labelledby="myModalChatBox" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <div class="chat-header">
            <div class="chat-profile">
              <img src="<?= $logo; ?>" alt="Profile Picture">
              <span class="profile-name">Chat - <?= $shorTitle; ?></span>
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body chat-box-body">
          <form action="" method="post">
            <div class="chat-container">
              <div class="chat-messages">
                <div class="message incoming">
                  <div class="message-content">
                    <p>Halo <?= $rowSession["full_name"]; ?>! ada yang bisa kami bantu?</p>
                    <span class="message-time"><?= date('H:i'); ?></span>
                  </div>
                </div>
                <!-- <div class="message outgoing">
              <div class="message-content">
                <p>Hi! How are you?</p>
                <span class="message-time">10:32 AM</span>
              </div>
            </div> -->
                <!-- Add more messages here -->
              </div>
              <div class="chat-input">
                <input type="text" placeholder="Ketik pesan" name="message_whatsapp">
                <button type="submit" name="send_whatsapp"><i class="bi bi-send-fill"></i></button>
              </div>
            </div>
          </form>
          <small>Anda akan langsung dialihkan ke WhatsApp </small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>



<?php if ($rowSession["level"] !== $levelSuperAdmin) : ?>
  <!-- Modal Information-->
  <?php if ($_GET["pages"] === "welcome") : ?>
    <?php if ($rowInformation["status"] === "1") : ?>
      <!-- Modal -->
      <div class="modal modal-information fade d-flex justify-content-center align-items-center" id="autoShowModalInformation" tabindex="-1" aria-labelledby="autoShowModalInformationLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="autoShowModalInformationLabel">Informasi | <small class="text-muted" style="font-size: 75%;"><i class="bi bi-calendar-date"></i> <?= date_id($rowInformation["date"]); ?></small></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
              <div class="card bg-warning p-4">
                <p>Halo <strong><?= $rowSession["full_name"]; ?>,</strong></p>
                <?= $rowInformation["description"]; ?>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>
<?php endif; ?>