<?php
class Request {
    public function __construct(
        private int $request_id,
        private string $service
    ) { }

    public function getRequest() {
        return $this->id;
    }

    public function setID(int $value) {
        $this->id = $value;
    }

    public function getService() {
        return $this->service;
    }

    public function setName(string $value) {
        $this->name = $value;
    }
}
?>