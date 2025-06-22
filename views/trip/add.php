<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-plane-departure me-2"></i>Добавление новой поездки</h2>
        <a href="index.php?entity=trip&action=list" class="btn btn-outline-secondary">
            <i class="fas fa-times me-1"></i> Отмена
        </a>
    </div>

    <form method="POST" action="index.php?entity=trip&action=add">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title mb-0">Основная информация</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Тур <span class="text-danger">*</span></label>
                    <select name="TourID" class="form-select" required>
                        <option value="">Выберите тур</option>
                        <?php foreach ($tours as $tour): ?>
                            <option value="<?= $tour['TourID'] ?>">
                                <?= $tour['Cities'] ?> (<?= $tour['Countries'] ?>) -
                                <?= date('d.m.Y', strtotime($tour['StartDate'])) ?> /
                                <?= number_format($tour['BaseCost'], 0, ',', ' ') ?> руб.
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Дата отправления <span class="text-danger">*</span></label>
                        <input type="date" name="DepartureDate" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Номер рейса <span class="text-danger">*</span></label>
                        <input type="text" name="FlightNumber" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success btn-lg">
                <i class="fas fa-save me-1"></i> Добавить поездку
            </button>
        </div>
    </form>
</div>