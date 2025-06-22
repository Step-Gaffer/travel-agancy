<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-map-marked-alt me-2"></i>Список туров</h2>
        <a href="index.php?entity=tour&action=add" class="btn btn-success">
            <i class="fas fa-plus me-1"></i> Добавить тур
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Страны</th>
                    <th>Города</th>
                    <th>Назначение</th>
                    <th>Даты</th>
                    <th>Стоимость</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tours as $tour): ?>
                    <tr>
                        <td><?= $tour['TourID'] ?></td>
                        <td><?= $tour['Countries'] ?></td>
                        <td><?= $tour['Cities'] ?></td>
                        <td><?= $tour['Purpose'] ?></td>
                        <td>
                            <?= date('d.m.Y', strtotime($tour['StartDate'])) ?> -
                            <?= date('d.m.Y', strtotime($tour['EndDate'])) ?>
                        </td>
                        <td><?= number_format($tour['BaseCost'], 0, ',', ' ') ?> руб.</td>
                        <td>
                            <div class="btn-group">
                                <a href="index.php?entity=tour&action=show&id=<?= $tour['TourID'] ?>"
                                    class="btn btn-sm btn-primary" title="Просмотр">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="index.php?entity=tour&action=edit&id=<?= $tour['TourID'] ?>"
                                    class="btn btn-sm btn-warning" title="Редактировать">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="index.php?entity=tour&action=delete&id=<?= $tour['TourID'] ?>"
                                    class="btn btn-sm btn-danger" title="Удалить"
                                    onclick="return confirm('Вы уверены? Удаление тура также удалит все связанные поездки!')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>