pipeline {
            agent any
                stages {
                        stage('Descargar ficheros configuración') {
                            steps {
                                echo 'descargando...'
                                sh 'rm -R .* || true'
                                sh 'rm -R * || true'
                                sh 'git clone  https://github.com/legolas60007/Jenkins-Wordpress.git .'
                            }
                        }
                        stage('Deploy Montar docker') {
                            steps { 
                                dir("/var/lib/jenkins/workspace/Jenkins-Wordpress/scripts"){
                                echo 'Contruyendo...'
                                sh 'docker-compose up -d'
                                        }
                            }
                        }
                       stage('Montar base de datos') {
                            steps {
                               sh 'docker exec -T scripts-bbdd-1 bash -c "mysql -u root -p secret < /home/VendProdct.sql" 
                            }
                        }
                        stage('Deploy Composer') {
                            steps {
                               dir("/var/lib/jenkins/workspace/Jenkins-Wordpress/PHP"){
                               echo 'Contruyendo composer...'
                               sh 'composer kint-php/kint'
                               sh 'composer install'
                                                }
                                    }
                        }
                }
            post {
                always {
                    echo 'Pipeline en ejecución'
                }
                success {
                    echo 'Parece que todo ha ido bien'
                }
                failure {
                    echo 'Algo ha fallado'
                    mail to: 'andres.alcaraz@politecnicomalaga.com',
                         subject: "Failed Pipeline: ${currentBuild.fullDisplayName}",
                         body: "Algo ha fallado con ${env.BUILD_URL}"
                }
            }
        }
