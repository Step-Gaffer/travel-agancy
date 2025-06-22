<div class="content-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-plane-departure me-2"></i>Список поездок</h2>
        <a href="index.php?entity=trip&action=add" class="btn btn-success">
            <i class="fas fa-plus me-1"></i> Добавить поездку
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Тур</th>
                    <th>Дата отправления</th>
                    <th>Рейс</th>
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($trips as $trip): ?>
                    <tr>
                        <td><?= $trip['TripID'] ?></td>
                        <td>
                            <?= $trip['Cities'] ?> (<?= $trip['Countries'] ?>)
                        </td>
                        <td><?= date('d.m.Y', strtotime($trip['DepartureDate'])) ?></td>
                        <td><?= $trip['FlightNumber'] ?></td>
                        <td>
                            <?php if ($trip['IsHot']): ?>
                                <span class="badge bg-danger">Горящая путёвка</span>
                            <?php else: ?>
                                <span class="badge bg-success">Доступна</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="index.php?entity=trip&action=show&id=<?= $trip['TripID'] ?>"
                                    class="btn btn-sm btn-primary" title="Просмотр">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="index.php?entity=trip&action=edit&id=<?= $trip['TripID'] ?>"
                                    class="btn btn-sm btn-warning" title="Редактировать">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="index.php?entity=trip&action=delete&id=<?= $trip['TripID'] ?>"
                                    class="btn btn-sm btn-danger" title="Удалить"
                                    onclick="return confirm('Вы уверены? Удаление поездки также удалит все связанные бронирования!')">
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