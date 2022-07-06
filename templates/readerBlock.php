<div class="card">
    <table style="color: #16232B; font-size: 24px">
        <tr>
            <h1 style="font-size: 32px">
                <?php
                print ($reader['number']);
                ?>
            </h1>
        </tr>
        <tr>
            <td class="elem">Имя:</td>
            <td class="elem">Фамилия:</td>
        </tr>
        <tr>
            <td class="elem">
                <h3>
                    <?php
                    print ($reader['readerFirst']);
                    ?>
                </h3>
            </td>
            <td class="elem">
                <h3>
                    <?php
                    print ($reader['readerLast']);
                    ?>
                </h3>
            </td>
        </tr>
    </table>
</div>
