<?php

namespace RunCloud\Utilities;

class TablePrinter
{
  private array $headers = [];
  private array $rows = [];
  private array $colWidths = [];

  public function setHeaders(array $headers): void
  {
    $this->headers = $headers;
    $this->calculateWidths($headers);
  }

  public function addRow(array $row): void
  {
    $this->rows[] = $row;
    $this->calculateWidths($row);
  }

  private function calculateWidths(array $row): void
  {
    foreach ($row as $i => $cell) {
      $length = strlen((string) $cell);
      if (!isset($this->colWidths[$i]) || $length > $this->colWidths[$i]) {
        $this->colWidths[$i] = $length;
      }
    }
  }

  private function printDivider(): void
  {
    foreach ($this->colWidths as $width) {
      echo str_repeat('-', $width) . '   ';
    }
    echo PHP_EOL;
  }

  public function print(): void
  {
    if (!empty($this->headers)) {
      $this->printRow($this->headers);
      $this->printDivider();
    }
    foreach ($this->rows as $row) {
      $this->printRow($row);
    }
  }

  private function printRow(array $row): void
  {
    foreach ($row as $i => $cell) {
      $width = $this->colWidths[$i] ?? strlen($cell);
      printf("%-{$width}s", $cell);
      echo "   ";
    }
    echo PHP_EOL;
  }
}
