module main

go 1.15

replace github.com/greggailly/pullUp/agent => ./agent

require (
	github.com/go-git/go-git/v5 v5.2.0 // indirect
	github.com/greggailly/pullUp/agent v0.0.0-00010101000000-000000000000
	github.com/robfig/cron/v3 v3.0.1
)
