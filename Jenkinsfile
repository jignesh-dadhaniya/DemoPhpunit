pipeline {
    agent any
    stages {
        stage('One') {
                steps {
                        echo 'Hi, this is Zulaikha from edureka'
			
                }
        }
	stage('Two') {
		    
		steps {
			input('Do you want to proceed?')
                }
	}
	stage('Composer Install') {
		steps {
            		sh 'composer install'
		}
        }
	stage("PHPUnit") {
            sh 'vendor/bin/phpunit --bootstrap vendor/autoload.php tests/simpleaddTest.php --configuration phpunit-coverage.xml'
        }

        stage("Publish Coverage") {
            publishHTML (target: [
                allowMissing: false,
                alwaysLinkToLastBuild: false,
                keepAll: true,
                reportDir: 'build/coverage',
                reportFiles: 'index.html',
                reportName: "Coverage Report"

            ])
        }

        stage('Three') {
                when {
                        not {
                                branch "master"
                        }
                }
                steps {
			echo "Hello"
                        }
        }
        stage('Four') {
                parallel {
                        stage('Unit Test') {
                                steps{
                                        echo "Running the unit test..."
                                }
                        }
                        stage('Integration test') {
                        agent {
                                docker {
                                        reuseNode false
					image 'ubuntu'
                                        }
			}
				steps {
					echo 'Running the integration test..'
				}
                               
			}  }
        }
    }
}
